import React from "react";
import Slider from "react-slick";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import "./carousel.css";
const images = [
  "https://media.topachat.com/media/s1000/649be289cb42ac1f062be67d.webp",
  "https://media.topachat.com/media/s1000/64c77d9e642f572b251f3ddf.webp",
  "https://media.ldlc.com/encart/p/21462_b.jpg",
  "https://www.aorus.com/image/banner/GOELITE-1690280290.jpg",
  "https://media.topachat.com/media/s1000/63639dcc3b1f41344e0c11a3.webp",
];

function Carousel() {
  const settings = {
    dots: true,
    infinite: true,
    speed: 500,
    slidesToShow: 1,
    slidesToScroll: 1,
  };

  return (
    <div className="conteneur">
      <Slider {...settings}>
        {images.map((imgPath, index) => (
          <div key={index}>
            <img
              className="carousel-image"
              src={imgPath}
              alt={`Slide ${index + 1}`}
            />
          </div>
        ))}
      </Slider>
    </div>
  );
}

export default Carousel;
