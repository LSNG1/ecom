import "./App.css";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import { Navbar } from "./components/navbar";
import { Shop } from "./pages/shop/shop";
import { Cart } from "./pages/cart/cart";
import { User } from "./pages/profil/user";
import Register from "./pages/user/register";

import SignInSide from "./pages/user/login";
import { ShopContextProvider } from "./context/shop-context";
import { Login } from "./pages/user/login";
import { AdminGuesser, ResourceGuesser } from "@api-platform/admin";
import Composants from "./components/Composants";

import { Admin } from "./pages/admin/admin";

import Footer from "./components/footer";
import ArticlePage from "./ArticlePage";

import Composants from "./components/Composants";
import Details from "./components/Details";

function App() {
  return (
    <div className="App">
      <ShopContextProvider>
        <Router>
          <Navbar />
          <Routes>
            <Route path="/" element={<Shop />} />
            <Route path="/Cart" element={<Cart />} />
            <Route path="/register" element={<Register />} />
            <Route path="/login" element={<Login />} />
            <Route path="/produits" element={<Composants />} />
            <Route path="/Profil" element={<User />} />
            <Route path="/articles/:id" element={<ArticlePage />} />
            <Route path="/admin/*" element={<Admin />} />
          <Route path="/produits/gpu/:id" element={<Details/>}/>


          </Routes>
          <Footer />
        </Router>
      </ShopContextProvider>
    </div>
  );
}

export default App;
