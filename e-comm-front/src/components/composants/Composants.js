import React, { useState, useEffect } from 'react';
import axios from 'axios';

export default function Composants() {
  const [data, setData] = useState([]);
  const [choix, setChoix] = useState(0);
  const [url, setUrl] = useState('');

  useEffect(() => {
    fetchInfo();
  }, [url]);

  const gpu = () => {
    setChoix(1);
    setUrl('http://127.0.0.1:34481/api/gpu');
    console.log('gpu');
  };

  const cpu = () => {
    setChoix(2);
    setUrl('http://127.0.0.1:34481/api/cpu');
    console.log('cpu');
  };

  const fetchInfo = () => {
    if (!url) return;
    axios
      .get(url)
      .then((res) => {
        setData(res.data);
      })
      .catch((error) => {
        console.error('Error fetching data:', error);
      });
  };

  if (choix === 0) {
    return (
      <div>
        <button type="button" onClick={cpu}>
          cpu
        </button>
        <button type="button" onClick={gpu}>
          gpu
        </button>
        <h1>pranked</h1>
      </div>
    );
  } else {
    return (
      <div className="App">
        <button type="button" onClick={cpu}>
          cpu
        </button>
        <button type="button" onClick={gpu}>
          gpu
        </button>
        <center>
          {data.map((dataObj) => {
            return (
              <div

                style={{
                  width: '15em',
                  backgroundColor: '#35D841',
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
}