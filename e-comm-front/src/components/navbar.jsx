import { ShoppingCart } from 'phosphor-react'
import React from 'react'
import { Link } from 'react-router-dom'
import "./navbar.css"
import logo from "../assets/logo.png"
import profil from "../assets/Web capture_3-8-2023_121450_wsl.localhost.jpeg"
// Mui Framework
import { styled, alpha } from '@mui/material/styles';
import AppBar from '@mui/material/AppBar';
import Box from '@mui/material/Box';
import Toolbar from '@mui/material/Toolbar';
import InputBase from '@mui/material/InputBase';
import SearchIcon from '@mui/icons-material/Search';

const Search = styled('div')(({ theme }) => ({
  position: 'relative',
  borderRadius: theme.shape.borderRadius,
  backgroundColor: alpha(theme.palette.common.white, 0.15),
  '&:hover': {
    backgroundColor: alpha(theme.palette.common.white, 0.25),
  },
  marginLeft: 0,
  width: '100%',
  [theme.breakpoints.up('sm')]: {
    marginLeft: theme.spacing(1),
    width: 'auto',
  },
}));

const SearchIconWrapper = styled('div')(({ theme }) => ({
  padding: theme.spacing(0, 2),
  height: '100%',
  position: 'absolute',
  pointerEvents: 'none',
  display: 'flex',
  alignItems: 'center',
  justifyContent: 'center',
}));

const StyledInputBase = styled(InputBase)(({ theme }) => ({
  color: 'inherit',
  '& .MuiInputBase-input': {
    padding: theme.spacing(1, 1, 1, 0),
    // vertical padding + font size from searchIcon
    paddingLeft: `calc(1em + ${theme.spacing(4)})`,
    transition: theme.transitions.create('width'),
    width: '100%',
    [theme.breakpoints.up('sm')]: {
      width: '12ch',
      '&:focus': {
        width: '20ch',
      },
    },
  },
}));
//
export const Navbar = () => {
  return (
    <div className='navbar'>
      <Link to="/"><img src={logo} alt="logo-fap" width={75} className='logo' style={{marginLeft: 2 + 'em', marginRight: 2 + 'em', marginTop: 1 + 'em', marginBottom: 1 + 'em'}} /></Link>
      <Box sx={{ flexGrow: 1 }}>
        <Search>
          <SearchIconWrapper>
            <SearchIcon  style={{color: 'white'}}/>
          </SearchIconWrapper>
          <StyledInputBase
          style={{color: 'white'}}
            placeholder="Search…"
            inputProps={{ 'aria-label': 'search' }}
          />
        </Search>
        <AppBar className='bl' position="static">
          <Toolbar>
              <div class="button-container">
                <div class="button-wrapper">
                  <Link to="/Ordinateur"> <button>Ordinateur</button></Link>
                </div>
                <div class="button-wrapper">
                  <Link to="/Composant"> <button>Composant</button></Link>
                </div>
                <div class="button-wrapper">
                  <Link to="/Périphérique"> <button>Périphérique</button></Link>
                </div>
              </div>
          </Toolbar>
        </AppBar>
      </Box>
      <div className='links'>
      <Link to="/Profil"><img src={profil} alt="logo-profil" width={50} style={{marginLeft: 1 + 'em', marginTop: 1 + 'em'}} /></Link>
      <Link to="/Cart">
          <ShoppingCart size={50} style={{marginLeft: 1 + 'em', marginBottom: 1 + 'em'}} />
        </Link>
      </div>
    </div>

  )
}