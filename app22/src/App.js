import logo from './logo.svg';
import './App.css';
import PreviousState1 from './PreviousState1';
import { useState } from 'react';
import PreviousProps from './PreviousProps';
import { Common } from './Components/commonContext';
import Home from './Components/Home';
import About from './Components/About';

function App() {
  // let [count, setCount] = useState(0);
  let [color, setColor] = useState("Red");
  return (
    <div className="App">
      {/* <PreviousState1></PreviousState1> */}
      {/* <PreviousProps data={count}></PreviousProps> */}
      {/* <button onClick={()=>setCount(count + 1)}>Update Props</button> */}
      {/* <button onClick={()=>setCount(Math.ceil(Math.random() * 100))}>Update Props</button> */}

      <Common.Provider value={{bgcolor : color}}>
        <Home />
        <About />
      </Common.Provider>
      <button onClick={()=>setColor("red")}>Red</button>
      <button onClick={()=>setColor("blue")}>Blue</button>
      <button onClick={()=>setColor("green")}>Green</button>
      <button onClick={()=>setColor("purple")}>Purple</button>

    </div>
  );
}

export default App;
