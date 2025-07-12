export default function Navigation() {
  const navItems = [
    { href: "/", label: "HOME" },
    { href: "/about", label: "ABOUT US" },
    { href: "/vehicles/rental", label: "VEHICLES" },
    { href: "/contact", label: "CONTACT" },
  ]

  return (
    <nav className="navigation">
      <div className="logo">VELOCITY MOTORS</div>
      <div className="nav-links">
        {navItems.map((item) => (
          <a key={item.href} href={item.href}>
            {item.label}
          </a>
        ))}
      </div>
    </nav>
  )
}
