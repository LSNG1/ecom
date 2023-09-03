import React from "react";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import { Navbar } from "./components/navbar";
import { Shop } from "./pages/shop/shop";
import { Cart } from "./pages/cart/cart";
import { Profile } from "./pages/profil/Profile";
import Register from "./pages/user/register";
import { Login } from "./pages/user/login";
import { Admin } from "./pages/admin/admin";
import Footer from "./components/footer";
import ArticlePage from "./ArticlePage";
import Checkout from "./pages/checkout/checkout";
import Composants from "./components/Composants";
import Details from "./components/Details";
import { ShopContextProvider } from "./context/shop-context";


import { Elements } from "@stripe/react-stripe-js";
import { loadStripe } from "@stripe/stripe-js";

const stripePromise = loadStripe(
  "pk_test_51NmGJyCDe7oVF85pCbcQNcB20YiCatJCjVhAJpGWDPwfcs3faO9KmKxrcN0GMtvtFajT4yXC2nG0QeUc1CW0RIji001ZzssJFN"
);

function App() {
  return (
    <div className="App">
      <ShopContextProvider>
        <Router>
          <Navbar />
          <Routes>
            <Route path="/" element={<Shop />} />
            <Route path="/Cart" element={<Cart />} />
            <Route path="/Profil" element={<Profile />} />
            <Route path="/register" element={<Register />} />
            <Route path="/login" element={<Login />} />
            <Route path="/produits" element={<Composants />} />
            <Route path="/articles/:id" element={<ArticlePage />} />
            <Route path="/produits/gpu/:id" element={<Details />} />
            <Route path="/admin/*" element={<Admin />} />
            <Route
              path="/Checkout"
              element={
                <Elements stripe={stripePromise}>
                  <Checkout />
                </Elements>
              }
            />
          </Routes>
          <Footer />
        </Router>
      </ShopContextProvider>
    </div>
  );
}

export default App;
