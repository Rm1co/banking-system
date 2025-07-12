import TopBar from "./components/TopBar"
import Navigation from "./components/Navigation"
import Timeline from "./components/Timeline"
import ContentSection from "./components/ContentSection"
import Footer from "./components/Footer"
import "./App.css"

function App() {
  return (
    <div className="App">
      <TopBar />
      <Navigation />
      <main className="container">
        <Timeline />
        <ContentSection />
      </main>
      <Footer />
    </div>
  )
}

export default App
