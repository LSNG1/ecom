import "./App.css";
import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import { Navbar } from "./components/navbar";
import { Shop } from "./pages/shop/shop"
import { Cart } from "./pages/cart/cart";
import { User } from "./pages/profil/user";
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
<<<<<<< HEAD
        

=======
          <Route path='/Profil' element={<User />}/>
          <Route path="/articles/:id" element={<ArticlePage />} />
>>>>>>> 8fca8bff01ea06b8c10223d6f3cf07e60bd9a8e6
        </Routes>
        <Footer />
      </Router>
      </ShopContextProvider>
    </div>
  );
}

export default App;
