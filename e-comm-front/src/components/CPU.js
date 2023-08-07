import React, { useState, useEffect } from 'react'
import axios from 'axios'

const url = "https://localhost/8000/api/cpu";

export default function CPU (){
  const [data, setData] = useState([]);

  const fetchInfo = () => {
    return fetch(url)
      .then((res) => res.json())
      .then((d) => setData(d))
  }


  useEffect(() => {
    fetchInfo();
  }, []);

  return (
    <div className="App">
      <center>
        {data.map((dataObj, index) => {
          return (
            <div
              style={{
                width: "15em",
                backgroundColor: "#35D841",
                padding: 2,
                borderRadius: 10,
                marginBlock: 10,
              }}
            >
              <p style={{ fontSize: 20, color: 'white' }}>{dataObj.name}</p>
              <p style={{ fontSize: 20, color: 'white' }}>{dataObj.price}€</p>
            </div>
          );
        })}
      </center>
    </div>
  );

}