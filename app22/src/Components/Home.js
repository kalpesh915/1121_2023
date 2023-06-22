import { useContext } from "react";
import { Common } from "./commonContext";
function Home(){
    const themecolor = useContext(Common);
    //console.log(bgcolor);
    return <>
        <h1 style={{backgroundColor: themecolor.bgcolor}}>Home Component</h1>  
    </>
}
export default Home;