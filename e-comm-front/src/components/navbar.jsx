import { ShoppingCart } from "phosphor-react";
import React, { useState } from "react";
import { Link } from "react-router-dom";
import { NavLink } from "react-router-dom";
import "./navbar.css";
import logo from "../assets/logo.png";
import profil from "../assets/Web capture_3-8-2023_121450_wsl.localhost.jpeg";
// Mui Framework
import { styled, alpha } from "@mui/material/styles";
import AppBar from "@mui/material/AppBar";
import Box from "@mui/material/Box";
import Toolbar from "@mui/material/Toolbar";
import InputBase from "@mui/material/InputBase";
import SearchIcon from "@mui/icons-material/Search";
// phosphore
import { Hamburger } from "phosphor-react";

const Search = styled("div")(({ theme }) => ({
  position: "relative",
  borderRadius: theme.shape.borderRadius,
  backgroundColor: alpha(theme.palette.common.white, 0.15),
  "&:hover": {
    backgroundColor: alpha(theme.palette.common.white, 0.25),
  },
  marginLeft: 0,
  width: "100%",
  [theme.breakpoints.up("sm")]: {
    marginLeft: theme.spacing(1),
    width: "auto",
  },
}));

const SearchIconWrapper = styled("div")(({ theme }) => ({
  padding: theme.spacing(0, 2),
  height: "100%",
  position: "absolute",
  pointerEvents: "none",
  display: "flex",
  alignItems: "center",
  justifyContent: "center",
}));

const StyledInputBase = styled(InputBase)(({ theme }) => ({
  color: "inherit",
  "& .MuiInputBase-input": {
    padding: theme.spacing(1, 1, 1, 0),
    // vertical padding + font size from searchIcon
    paddingLeft: `calc(1em + ${theme.spacing(4)})`,
    transition: theme.transitions.create("width"),
    width: "100%",
    [theme.breakpoints.up("sm")]: {
      width: "12ch",
      "&:focus": {
        width: "20ch",
      },
    },
  },
}));
//
export const Navbar = () => {
  const [showNavbar, setShowNavbar] = useState(false);

  const handleShowNavbar = () => {
    setShowNavbar(!showNavbar);
  };

  return (
    <AppBar position="static" className="navbar">
      <Toolbar>
        <div className="container flex items-center justify-between">
          <div className="menu-icon" onClick={handleShowNavbar}>
            <Hamburger size={32} weight="bold" style={{ color: "#E8DDCA" }} />
          </div>
          <div className={`nav-elements ${showNavbar ? "active" : ""}`}>
            <ul className="flex items-center space-x-6">
              <li>
                <div className="logo">
                  <Link to="/">
                    <img
                      src={logo}
                      alt="logo-fap"
                      width={35}
                      className="logo"
                    />
                  </Link>
                </div>
              </li>
              <li>
                <div className="relative">
                  <SearchIcon
                    style={{ color: "white" }}
                    className="absolute inset-y-0 left-3 top-1/2 transform -translate-y-1/2"
                  />
                  <InputBase
                    style={{ color: "white" }}
                    placeholder="Search…"
                    inputProps={{ "aria-label": "search" }}
                    className="pl-12"
                  />
                </div>
              </li>
              <li>
                <NavLink
                  to="/Ordinateur"
                  className="text-white"
                  activeClassName="font-semibold"
                >
                  Ordinateur
                </NavLink>
              </li>
              <li>
                <NavLink
                  to="/Composant"
                  className="text-white"
                  activeClassName="font-semibold"
                >
                  Composant
                </NavLink>
              </li>
              <li>
                <NavLink
                  to="/Périphérique"
                  className="text-white"
                  activeClassName="font-semibold"
                >
                  Périphérique
                </NavLink>
              </li>
              <li>
                <NavLink to="/Profil">
                  <img
                    src={profil}
                    alt="logo-profil"
                    width={35}
                    className="ml-4 mt-4"
                  />
                </NavLink>
              </li>
              <li>
                <NavLink to="/Cart" className="ml-4 mb-4">
                  <ShoppingCart size={35} />
                </NavLink>
              </li>
            </ul>
          </div>
        </div>
      </Toolbar>
    </AppBar>
  );
};