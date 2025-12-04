<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Project::where('featured', true)->get();
        return view('portfolio.index', compact('projects'));
    }

    public function projects()
    {
        $projects = Project::all();
        return view('portfolio.projects', compact('projects'));
    }

    public function show(Project $project)
    {
        return view('portfolio.show', compact('project'));
    }

    public function contact()
    {
        return view('portfolio.contact');
    }

    public function storeContact(Request $request)
    {
        // Rate limiting check - 5 requests per minute per IP
        $this->rateLimit($request);

        // Comprehensive validation
        $validated = $request->validate([
            'name' => 'required|string|max:255|regex:/^[a-zA-Z\s\'.-]*$/',
            'email' => 'required|email:rfc,dns|max:255',
            'subject' => 'required|string|max:255|regex:/^[a-zA-Z0-9\s\-.,!?\']*$/',
            'message' => [
                'required',
                'string',
                'min:10',
                'max:5000',
                'regex:/^[a-zA-Z0-9\s\n\r\-.,!?\'":();\/]*$/',
            ],
        ], [
            'name.regex' => 'Name can only contain letters, spaces, hyphens, dots and apostrophes.',
            'subject.regex' => 'Subject contains invalid characters.',
            'message.regex' => 'Message contains invalid characters.',
            'email.email' => 'Please provide a valid email address.',
        ]);

        // Sanitize inputs
        $validated['name'] = htmlspecialchars($validated['name'], ENT_QUOTES, 'UTF-8');
        $validated['subject'] = htmlspecialchars($validated['subject'], ENT_QUOTES, 'UTF-8');
        $validated['message'] = htmlspecialchars($validated['message'], ENT_QUOTES, 'UTF-8');
        $validated['ip_address'] = $request->ip();
        $validated['user_agent'] = substr($request->userAgent(), 0, 255);

        // Store message in session for demo (in production, store in database)
        session(['last_contact' => $validated]);

        return redirect()->back()->with('success', 'Thank you for your message! I will get back to you soon.');
    }

    private function rateLimit(Request $request)
    {
        $key = 'contact_form_' . $request->ip();
        $maxAttempts = 5;
        $decayMinutes = 1;

        if (cache()->has($key)) {
            $attempts = cache()->get($key);
            if ($attempts >= $maxAttempts) {
                throw ValidationException::withMessages([
                    'rate_limit' => 'Too many contact form submissions. Please try again later.',
                ]);
            }
            cache()->increment($key);
        } else {
            cache()->put($key, 1, now()->addMinutes($decayMinutes));
        }
    }
}
