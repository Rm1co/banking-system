export default function TopBar() {
  return (
    <div className="top-bar">
      <div className="contact-info-top">
        <span>Phone: +254 757 888 000</span>
        <span>info@velocitymotors.com</span>
        <span>Mon-Sat: 09:00 - 17:00</span>
      </div>
      <div className="action-buttons">
        <a href="/auth/login" className="login-btn">
          Login
        </a>
        <a href="/vehicles/rental" className="rental-btn">
          Rental
        </a>
        <a href="/prices" className="prices-btn">
          Prices
        </a>
      </div>
    </div>
  )
}
