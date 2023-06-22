import { useContext } from "react";
import { Common } from "./commonContext";

function About(){
    const themecolor = useContext(Common);
    return <>
        <h1 style={{backgroundColor:themecolor.bgcolor}}>About Component</h1>
    </>
}
export default About;