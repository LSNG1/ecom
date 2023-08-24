import React, { useContext } from 'react';
import { Link } from 'react-router-dom';
import { ShopContext } from '../../context/shop-context';
import './product.css';

export const Product = (props) => {
  const { id, productName, price, productImage } = props.data;
  const { addToCart, cartItems } = useContext(ShopContext);
  const cartItemAmount = cartItems[id];

  // Access the articleContent prop passed from ArticlePage
  const articleContent = props.articleContent;

  return (
    <div className='product'>
      <Link to={`/articles/${id}`}>
        <img src={productImage} alt={productName} />
        <div className='description'>
          <p>
            <b>{productName}</b>
          </p>
          <p>${price}</p>
        </div>
      </Link>
      <button className='addToCartBttn' onClick={() => addToCart(id)}>
        Add To Cart {cartItemAmount > 0 && <> ({cartItemAmount})</>}
      </button>
      {/* Display the articleContent */}
      <p>{articleContent}</p>
    </div>
  );
};