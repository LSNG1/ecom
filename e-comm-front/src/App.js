import "./App.css";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import { Navbar } from "./components/navbar";
import { Shop } from "./pages/shop/shop"
import { Cart } from "./pages/cart/cart";
import { User } from "./pages/profil/user";
import Register from "./pages/user/register";
import SignInSide from "./pages/user/login";
import { ShopContextProvider } from "./context/shop-context";
import Footer from "./components/footer";
import ArticlePage from "./ArticlePage";

function App() {
  return (
    <div className="App">
      <ShopContextProvider>
      <Router>
        <Navbar />
        <Routes>
          <Route path="/" element={<Shop />}/>
          <Route path="/Cart" element={<Cart />}/>
          <Route path='/Profil' element={<User />}/>
          <Route path="/articles/:id" element={<ArticlePage />} />
          <Route path='/register' element={<Register />}/>
          <Route path='/login' element={<SignInSide />}/>
        </Routes>
        <Footer />
      </Router>
      </ShopContextProvider>
    </div>
  );
}

export default App;
  