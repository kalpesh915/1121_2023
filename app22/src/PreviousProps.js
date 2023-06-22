import { useEffect, useRef } from "react";

function PreviousProps(props){
    const lastValue = useRef();
    useEffect(()=>{
        lastValue.current = props.data;
    });
    return <>
        <h1>Example of Previous Props</h1>
        <h1>Value of Current Props is {props.data} Last Value {lastValue.current}</h1>
    </>
}

export default PreviousProps;