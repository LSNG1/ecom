import React, { useContext }  from 'react';
import { useParams } from 'react-router-dom';
import { PRODUCTS } from './products';
import { ShopContext } from './context/shop-context';

const ArticlePage = () => {
  const { id } = useParams(); // Assuming you use the 'id' parameter from the URL to identify the article
  const { addToCart, cartItems } = useContext(ShopContext);
  const cartItemAmount = cartItems[id];

  // Find the product with the matching 'id'
  const product = PRODUCTS.find((product) => product.id === parseInt(id, 10));

  // Check if the product exists
  if (!product) {
    return <div>Product not found</div>;
  }

  // Now you have the product details, including productName, price, and productImage
  const { productName, price, productImage, productDescription } = product;

  return (
    <div>
      <h1>Article {id}</h1>
      <p>{productName}</p>
      <img src={productImage} alt={productName} />
      <p>${price}</p>
      <p>{productDescription}</p>
      <button className='addToCartBttn' onClick={() => addToCart(id)}>
        Add To Cart {cartItemAmount > 0 && <> ({cartItemAmount})</>}
      </button>
    </div>
  );
};

export default ArticlePage;