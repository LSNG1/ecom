import React from 'react';
import logo from './logo.png';
import './App.css';

const products = [
  {
    id: 1,
    name: 'Product 1',
    price: '$100',
    imageUrl: 'https://example.com/product1.jpg',
  },
  {
    id: 2,
    name: 'Product 2',
    price: '$150',
    imageUrl: 'https://example.com/product2.jpg',
  },
  {
    id: 3,
    name: 'Product 3',
    price: '$120',
    imageUrl: 'https://example.com/product3.jpg',
  },
  {
    id: 4,
    name: 'Product 4',
    price: '$180',
    imageUrl: 'https://example.com/product4.jpg',
  },
  {
    id: 5,
    name: 'Product 5',
    price: '$90',
    imageUrl: 'https://example.com/product5.jpg',
  },
  {
    id: 6,
    name: 'Product 6',
    price: '$200',
    imageUrl: 'https://example.com/product6.jpg',
  },
];

function App() {
  return (
    <div>
      <nav className="navbar background">
        <ul className="nav-list">
          <div className="logo">
            <img src={logo} className="App-logo" alt="logo" />
          </div>
          <li><a href="#products">Products</a></li>
          <li><a href="#advice">Advice</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href='#contact'>Contact</a></li>
        </ul>

        <div className="rightNav">
          <input type="text" name="search" id="search" />
          <button className="btn btn-sm">Search</button>
        </div>
      </nav>

      <section className="section">
        <div className="box-main">
          <div className="product-container">
            {products.slice(0, 3).map((product) => (
              <div key={product.id} className="product-box box1">
                <img src={product.imageUrl} alt={product.name} />
                <h2>{product.name}</h2>
                <p>{product.price}</p>
              </div>
            ))}
          </div>

          <div className="product-container">
            {products.slice(3).map((product) => (
              <div key={product.id} className="product-box box2">
                <img src={product.imageUrl} alt={product.name} />
                <h2>{product.name}</h2>
                <p>{product.price}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      <footer className="footer">
        <p className="text-footer">Copyright ©-All rights are reserved</p>
      </footer>
    </div>
  );
}

export default App;