// import logo from './logo.svg';
// import './App.css';
import Header from './components/Header';
import Main from './components/Main';
import Basket from './components/Basket';
import data from './data';
import { useState } from 'react';

function App() {
  const { products } = data;
  const [cartItems, setCartItems] = useState([]);
  const onAdd = (product) => {
    const exist = cartItems.find(x => x.id === product.id);
    if (exist) {
      setCartItems(cartItems.map(x => 
        x.id === product.id ? {...exist, qty: exist.qty+1} : x));
    } else {
      setCartItems([...cartItems, {...product, qty:1}]);
    }
  };
  const onRemove = (id) => {
    const exist = cartItems.find(x => x.id === id);
    if (exist.qty > 1) {
      setCartItems(cartItems.map(x => 
        x.id === id ? {...exist, qty: exist.qty-1} : x));
    } else {
      setCartItems(cartItems.filter(x => x.id !== id));
    }
  }
  return (
    <div className="App">
      <Header></Header>
      <div className="row">
        <Main onAdd={onAdd} products={products}></Main>
        <Basket onAdd={onAdd} onRemove={onRemove} cartItems={cartItems}></Basket>
      </div>
    </div>
  );
}

export default App;
