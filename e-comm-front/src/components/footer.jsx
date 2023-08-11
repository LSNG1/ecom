// Footer.js
import React from "react";
import { Link } from 'react-router-dom'
import Payment from "../assets/image.png"
import { InstagramLogo } from "phosphor-react";
import { TwitterLogo } from "phosphor-react";
import { LinkedinLogo } from "phosphor-react";
// // phosphore icons
// import ReactDOM from "react-dom";
// import { PaypalLogo } from "@phosphor-icons/react";
import "./footer.css";

const Footer = () => {
  return (
    <footer className="footer">
      {/* Your footer content goes here */}
      <p>&copy; {new Date().getFullYear()} LigmaBalls.Inc</p>
      <Link to="/livraison">Livraison</Link>
      <Link to="/Contact-Us">Contact Us</Link>
      <img src={Payment} alt="moyens de payements" />
      <div className="social-icons">
        <div class="réseau"><InstagramLogo size={24} /></div>
        <div class="réseau"><TwitterLogo size={24} /></div>
        <div class="réseau"><LinkedinLogo size={24} /></div>
        {/* <PaypalLogo size={32} weight="light" /> */}
        
      </div>

    </footer>
  );
};
// ReactDOM.render(<Footer />, document.getElementById("root"));
export default Footer;