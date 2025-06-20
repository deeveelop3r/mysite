type Props = {
  frameworks: string[]
  selected: string
  onSelect: (fw: string) => void
}

export default function FrameworkFilter({ frameworks, selected, onSelect }: Props) {
  return (
    <select
      value={selected}
      onChange={e => onSelect(e.target.value)}
      className="border p-2 rounded-xl"
    >
      <option value="">All Frameworks</option>
      {frameworks.map(fw => (
        <option key={fw} value={fw}>{fw}</option>
      ))}
    </select>
  )
}
