import React, { useState, useEffect } from 'react'
import axios from 'axios'

const temp_url = window.location.href;
const id = temp_url.substring(35);
const url = "https://127.0.0.1:8000/api/gpus/" + id;

export default function Details (){
  const [data, setData] = useState([]);

  const fetchInfo = () => {
    if (!url) return;
    axios
      .get(url)
      .then((res) => {
        setData(res.data);
        console.log(res.data)
      })
      .catch((error) => {
        console.error('Error fetching data:', error);
      });
  };


  useEffect(() => {
    fetchInfo();
  }, []);

  return (
    <div className="App">
      <center>
            <div
              style={{
                width: "15em",
                backgroundColor: "#35D841",
                padding: 2,
                borderRadius: 10,
                marginBlock: 10,
              }}
            >
              <p style={{ fontSize: 20, color: 'white' }}>{data.name}</p>
              <p style={{ fontSize: 20, color: 'white' }}>{data.price}€</p>
            </div>
      </center>
    </div>
  );

}