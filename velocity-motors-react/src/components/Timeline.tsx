"use client"

import { useState } from "react"

interface TimelineItem {
  year: string
  title: string
  description: string
}

export default function Timeline() {
  const [selectedYear, setSelectedYear] = useState<string | null>(null)

  const timelineData: TimelineItem[] = [
    {
      year: "1997",
      title: "Founded by Mr. Marvin",
      description: "Made our first car sale in Nairobi",
    },
    {
      year: "2007",
      title: "Expanded Services",
      description: "Added car rentals and maintenance",
    },
    {
      year: "2017",
      title: "Regional Recognition",
      description: "Named best dealer in East Africa",
    },
    {
      year: "2023",
      title: "10+ Years Strong",
      description: "Serving thousands of customers",
    },
  ]

  return (
    <div className="timeline-section">
      <h1>Our Journey</h1>
      <p>
        Since our founding in 1997, we've grown to become one of East Africa's leading car dealerships, winning multiple
        awards and expanding our services across the region.
      </p>

      <hr />

      <div className="timeline-dates">
        {timelineData.map((item) => (
          <button
            key={item.year}
            onClick={() => setSelectedYear(selectedYear === item.year ? null : item.year)}
            className={selectedYear === item.year ? "selected" : ""}
          >
            {item.year}
          </button>
        ))}
      </div>

      <hr />

      <div className="timeline-items">
        {timelineData.map((item) => (
          <div key={item.year} className={`timeline-item ${selectedYear === item.year ? "highlighted" : ""}`}>
            <h4>{item.title}</h4>
            <p>{item.description}</p>
          </div>
        ))}
      </div>

      {selectedYear && (
        <div className="timeline-info">
          <p>
            <strong>Year {selectedYear}:</strong> Click on other years to explore our journey!
          </p>
        </div>
      )}
    </div>
  )
}
