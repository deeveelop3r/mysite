// data/projects.ts
export type Project = {
  title: string
  framework: string
  description: string
  url: string
  repo: string
  tags: string[]
  image: string
}

export const projects: Project[] = [
  {
    title: "Todo App React",
    framework: "React",
    description: "Simple todo app with React.",
    url: "https://demo-link.com",
    repo: "https://github.com/username/todo-react",
    tags: ["Frontend"],
    image: "/images/todo-react.png"
  },
  // ...dst
]
