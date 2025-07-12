"use client"

import { useState } from "react"

export default function ContentSection() {
  const [selectedService, setSelectedService] = useState<string>("general")

  const services = {
    general: {
      title: "Our Services",
      content:
        "We offer both new and used cars, spare parts, and maintenance services with a five-year warranty. Our commitment to quality and customer satisfaction has made us a leader in the automotive industry.",
    },
    rentals: {
      title: "Special Occasion Rentals",
      content:
        "We also rent cars for special occasions including weddings, corporate events, and luxury travel experiences.",
    },
    location: {
      title: "Our Location",
      content:
        "We are conveniently located in the Westlands area of Nairobi, easily accessible to all our valued customers.",
    },
  }

  return (
    <div className="content-section">
      <div className="service-tabs">
        {Object.entries(services).map(([key, service]) => (
          <button key={key} onClick={() => setSelectedService(key)} className={selectedService === key ? "active" : ""}>
            {service.title}
          </button>
        ))}
      </div>

      <h2>{services[selectedService as keyof typeof services].title}</h2>
      <p>{services[selectedService as keyof typeof services].content}</p>

      {selectedService === "rentals" && (
        <div className="image-gallery">
          <img src="/placeholder.svg?height=200&width=300" alt="Wedding car rental" />
          <img src="/placeholder.svg?height=200&width=300" alt="Luxury car rental" />
          <img src="/placeholder.svg?height=200&width=300" alt="Premium car rental" />
        </div>
      )}

      {selectedService === "location" && (
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15955.364608344371!2d36.801273915333155!3d-1.2681032326507555!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x182f173c0a1f9de7%3A0xad2c84df1f7f2ec8!2sWestlands%2C%20Nairobi!5e0!3m2!1sen!2ske!4v1674198871101!5m2!1sen!2ske"
          width="100%"
          height="400"
          style={{ border: 0, borderRadius: "8px", marginTop: "20px" }}
          allowFullScreen
          loading="lazy"
          referrerPolicy="no-referrer-when-downgrade"
        />
      )}
    </div>
  )
}
