import "./App.css";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import { Navbar } from "./components/navbar";
import { Shop } from "./pages/shop/shop"
import { Cart } from "./pages/cart/cart";
import { ShopContextProvider } from "./context/shop-context";
import { Register } from "./pages/user/register";
import Composants from "./components/Composants";
import Details from "./components/Details";

function App() {
	
  return (
    <div className="App">
      <ShopContextProvider>
      <Router>
        <Navbar />
        <Routes>
          <Route path="/" element={<Shop />}/>
          <Route path="/Cart" element={<Cart />}/>
          <Route path="/register" element={<Register />}/>
          <Route path="/produits" element={<Composants/>}/>
          <Route path="/produits/gpu/:id" element={<Details/>}/>


        </Routes>
      </Router>
      </ShopContextProvider>
    </div>
  );
}

export default App;
