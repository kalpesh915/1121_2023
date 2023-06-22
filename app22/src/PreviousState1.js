import { useState } from "react";

function PreviousState1(){
    let [count, setCount] = useState(0);
    return <>
        <h1>Previous State Example</h1>
        <h1>Count is {count}</h1>
        {/* <button onClick={()=>setCount(count + 1)}>Update Count</button> */}
        {/* <button onClick={()=>setCount(Math.ceil(Math.random()*10))}>Update Count</button> */}
        <button onClick={()=>setCount((previous)=>{
             let tmp = Math.ceil(Math.random()*10)

            // logic 1
            // if(previous == tmp){
            //     alert("Both Numbers are Same");
            // }else{
            //     return tmp;
            // }

            // logic 2
            // console.log("Previous "+previous+" Next "+tmp);
            // return tmp;

            //logic 2
            for(let i=1; i<=10; i++){
                previous += i;
            }

            return previous;
        })}>Update Count</button>
    </>
}

export default PreviousState1;