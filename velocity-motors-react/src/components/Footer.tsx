export default function Footer() {
  const quickLinks = [
    { href: "/", label: "Home" },
    { href: "/about", label: "About Us" },
    { href: "/vehicles/rental", label: "Vehicles" },
    { href: "/contact", label: "Contact" },
    { href: "/partnership", label: "Partnership" },
    { href: "/terms", label: "Terms & Conditions" },
  ]

  return (
    <footer className="footer">
      <div className="footer-column">
        <h3>Get More</h3>
        <p>Subscribe to our newsletter for the latest vehicles and offers.</p>
      </div>

      <div className="footer-column">
        <h3>Quick Links</h3>
        <ul>
          {quickLinks.map((link) => (
            <li key={link.href}>
              <a href={link.href}>{link.label}</a>
            </li>
          ))}
        </ul>
      </div>

      <div className="footer-column">
        <h3>Connect</h3>
        <div className="social-links">
          <a href="#">
            <img src="/placeholder.svg?height=24&width=24" alt="Facebook" />
          </a>
          <a href="#">
            <img src="/placeholder.svg?height=24&width=24" alt="Twitter" />
          </a>
          <a href="#">
            <img src="/placeholder.svg?height=24&width=24" alt="Instagram" />
          </a>
        </div>
      </div>
    </footer>
  )
}
