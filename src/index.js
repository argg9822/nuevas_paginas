import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';
import App from './App';
import reportWebVitals from './reportWebVitals';

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <React.StrictMode>
      <App />
  </React.StrictMode>
);

let hora = new Date().toLocaleTimeString();

const elementNow = ReactDOM.createRoot(document.getElementById('hour'));
elementNow.render(
  <span>{hora}</span>
)

reportWebVitals();