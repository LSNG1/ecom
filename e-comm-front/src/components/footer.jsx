// Footer.js
import React from "react";
import { Link } from 'react-router-dom'
import Payment from "../assets/image.png"
import { InstagramLogo } from "phosphor-react";
import { TwitterLogo } from "phosphor-react";
import { LinkedinLogo } from "phosphor-react";

const Footer = () => {
  return (
    <footer className="footer">
      {/* Your footer content goes here */}
      <p>&copy; {new Date().getFullYear()} LigmaBalls.Inc</p>
      <Link to="/livraison">Livraison</Link>
      <Link to="/Contact-Us">Contact Us</Link>
      <img src={Payment} alt="moyens de payements" />
      <div><InstagramLogo size={24} /></div>
      <div><TwitterLogo size={24} /></div>
      <div><LinkedinLogo size={24} /></div>
    </footer>
  );
};

export default Footer;