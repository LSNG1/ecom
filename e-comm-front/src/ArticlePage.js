import React from 'react';
import { useParams } from 'react-router-dom';
import { PRODUCTS } from './products'; // Import the PRODUCTS data

const ArticlePage = () => {
  const { id } = useParams(); // Assuming you use the 'id' parameter from the URL to identify the article

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
    </div>
  );
};

export default ArticlePage;