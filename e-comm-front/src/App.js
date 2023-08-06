import "./App.css";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import { Navbar } from "./components/navbar";
import { Shop } from "./pages/shop/shop"
import { Cart } from "./pages/cart/cart";
import GPU from "./components/composants/Composants";
function App() {
  return (
    <div className="App">
      <Router>
        <Navbar />
        <Routes>
          <Route path="/" element={<Shop />}/>
          <Route path="/Pannier" element={<Cart />}/>
          <Route path="/produits" element={<GPU />}/>

        </Routes>
      </Router>
    </div>
  );
}

export default App;
