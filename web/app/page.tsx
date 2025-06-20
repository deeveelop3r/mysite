'use client'

import { useState } from "react"
import { projects } from "@/data/projects"
import FrameworkFilter from "@/components/FrameworkFilter"

const frameworks = [...new Set(projects.map((p) => p.framework))]

export default function Home() {
  const [selected, setSelected] = useState("")
  const filtered = selected ? projects.filter(p => p.framework === selected) : projects

  return (
    <div className="p-4 max-w-4xl mx-auto">
      <h1 className="text-3xl font-bold mb-4">My Web Development Portfolio</h1>
      <FrameworkFilter frameworks={frameworks} selected={selected} onSelect={setSelected} />
      <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
        {filtered.map(p => (
          <div key={p.title} className="bg-white rounded-2xl shadow p-4">
            <img src={p.image} alt={p.title} className="w-full h-40 object-cover rounded-xl mb-2" />
            <h2 className="font-semibold text-lg">{p.title}</h2>
            <p className="text-gray-600 mb-2">{p.description}</p>
            <span className="inline-block bg-gray-100 text-gray-700 text-xs px-2 py-1 rounded">{p.framework}</span>
            <div className="mt-3 flex gap-3">
              <a href={p.url} className="text-blue-600 underline" target="_blank" rel="noopener noreferrer">Demo</a>
              <a href={p.repo} className="text-gray-600 underline" target="_blank" rel="noopener noreferrer">Source</a>
            </div>
          </div>
        ))}
      </div>
    </div>
  )
}
