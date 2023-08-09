import "./App.css";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import { Navbar } from "./components/navbar";
import { Shop } from "./pages/shop/shop"
import { Cart } from "./pages/cart/cart";
import { Register } from "./pages/user/register";
import { Login } from "./pages/user/login";

function App() {
  return (
    <div className="App">
      <Router>
        <Navbar />
        <Routes>
          <Route path="/" element={<Shop />}/>
          <Route path="/Pannier" element={<Cart />}/>
          <Route path="/register" element={<Register />}/>
          <Route path="/login" element={<Login />}/>

        </Routes>
      </Router>
    </div>
  );
}

export default App;
