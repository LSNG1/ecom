import React from 'react';
import { PRODUCTS } from '../../products';
import { Product } from './product';
import './shop.css';
import SwipeableTextMobileStepper from '../../components/carousel'

export const Shop = () => {
  // Get the first product from the PRODUCTS array
  const firstProduct = PRODUCTS[0];
  const secondProduct = PRODUCTS[1];
  const thirdProduct = PRODUCTS[2];
  const fourthProduct = PRODUCTS[3];
  const fifthProduct = PRODUCTS[4];
  const sixedProduct = PRODUCTS[5];
  const seventhProduct = PRODUCTS[6];
  const eightProduct = PRODUCTS[7];
  const ninthProduct = PRODUCTS[8];

  return (
    <div className='shop'>
    <button>Dick’s Fapper</button>
      <div className='Carousel'>
        <SwipeableTextMobileStepper />
      </div>
      <div className='shopTitle'>
        <h1>Welcome Page</h1>
      </div>
      <div className='products'>
        <Product data={firstProduct} />
        <Product data={secondProduct} />
        <Product data={thirdProduct} />
      </div>
      <div className='products'>
        <Product data={fourthProduct} />
        <Product data={fifthProduct} />
        <Product data={sixedProduct} />
      </div>
      <div className='products'>
        <Product data={seventhProduct} />
        <Product data={eightProduct} />
        <Product data={ninthProduct} />
      </div>
    </div>
  );
};