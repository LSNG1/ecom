import React from 'react';
import logo from './logo.png';
import mystere from './mystere.jpg';
import './App.css';

const products = [
  {
    id: 1,
    name: 'Product 1',
    price: '$100',
    imageUrl: 'data:image/png;base64,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',
  },
  {
    id: 2,
    name: 'Product 2',
    price: '$150',
    imageUrl: 'data:image/png;base64,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',
  },
  {
    id: 3,
    name: 'Product 3',
    price: '$120',
    imageUrl: 'data:image/png;base64,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',
  },
  {
    id: 4,
    name: 'Product 4',
    price: '$180',
    imageUrl: 'data:image/png;base64,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',
  },
  {
    id: 5,
    name: 'Product 5',
    price: '$90',
    imageUrl: 'data:image/png;base64,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',
  },
  {
    id: 6,
    name: 'Product 6',
    price: '$200',
    imageUrl: 'data:image/png;base64,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',
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
            {products.slice(0, 2).map((product) => (
              <div key={product.id} className="product-box box1">
                <p>HOTTEST PRODUCTS<br></br></p>
                <img src={product.imageUrl} alt={product.name} />
                <h2>{product.name}</h2>
                <p>{product.price}</p>
              </div>
            ))}
          </div>

          <div className="product-container">
            {products.slice(2, 4).map((product) => (
              <div key={product.id} className="product-box box2">
                <p>RANDOM HOT PRODUCTS <br></br></p>
                <img src={product.imageUrl} alt={product.name} />
                <h2>{product.name}</h2>
                <p>{product.price}</p>
              </div>
            ))}
          </div>

          <div className="product-container">
            {products.slice(4 , 6).map((product) => (
              <div key={product.id} className="product-box box3">
                <p>CHEAP BUT GREAT<br></br></p>
                <img src={product.imageUrl} alt={product.name} />
                <h2>{product.name}</h2>
                <p>{product.price}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      <footer className="footer">
        <p className="text-footer">Copyright © 2023-2023 / FlopAchatPc</p>
      </footer>
    </div>
  );
}

export default App;

/* Pendant cette semaine on a réflechit dans un premier temps à la gestion du projet avec un trello qu'on a relié directement au trello, un trello magnifique d'ailleurs. On a reflechit au début avec Mike pour la DA du site et fait les differents templates. ¨puis de mon coté j'ai fait la page d'accueil les produits affichés ne seront pas ceux là mais on va faire 2 parties, une avec les produits les plus populaires et une avec des produits mysteres */