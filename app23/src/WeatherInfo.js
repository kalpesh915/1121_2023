
import { useEffect, useState } from 'react';
function WeatherInfo() {
    let [city, setCity] = useState("Rajkot");
    let [cityName, setcityName] = useState([]);

    //seprate state to store data
    let [coords, setCoords] = useState([]);
    let [weather, setWeather] = useState([]);
    let [main, setMain] = useState([]);
    let [wind, setWind] = useState([]);
    let [clouds, setClouds] = useState([]);
    let [sys, setSys] = useState([]);
    let [icon, setIcon] = useState();
    let APIURL = "https://api.openweathermap.org/data/2.5/weather?q=" + city + "&appid=cc49a1b157d9c597ad4623b6276609d7&units=metric";

    useEffect(() => {
        loadWeatherData();
    }, []);

    function loadWeatherData() {
        fetch(APIURL).then((result) => {
            result.json().then((response) => {

                //console.log(response);
                //setData(response);
                //console.log(data);
                if (response.cod == 404) {
                    alert("Invalid City "+city);
                } else {
                    setCoords(response.coord);
                    setWeather(response.weather);
                    setMain(response.main);
                    setWind(response.wind);
                    setClouds(response.clouds);
                    setSys(response.sys);
                    setcityName(response.name);


                    if(weather[0].main !== ""){
                        switch(weather[0].main){
                            case "Clouds":{
                                setIcon("wi wi-day-cloudy");
                                break;
                            }
                            case "Rain":{
                                setIcon("wi wi-day-rain");
                                break;
                            }
                            case "Snow":{
                                setIcon("wi wi-day-snow");
                                break;
                            }
                            case "Haze":{
                                setIcon("wi wi-fog");
                                break;
                            }
                            case "Mist":{
                                setIcon("wi wi-dust");
                                break;
                            }
                            case "Clear":{
                                setIcon("wi wi-day-sunny");
                                break;
                            }

                            default:{
                                setIcon("wi wi-day-sunny");
                                break;
                            }
                        }
                    }else{
                        setIcon("wi wi-day-sunny");
                    }
                    
                }

            });
        })
    }

    const sunrisetime = new Date(sys.sunrise * 1000);
    const sunrisetimestr = sunrisetime.getHours()+ ":" + sunrisetime.getMinutes();
    

    const sunsettime = new Date(sys.sunset * 1000);
    const sunsettimestr = sunrisetime.getHours()+ ":" + sunsettime.getMinutes();

    return <>
        <div className='container-fluid w-75 mx-auto rounded'>
            <h1 className='bg-primary text-white p-4 text-center'>Weather Information Application</h1>
            
                <div className='input-group input-group-lg'>
                    <input type='search' name='searchcity' id='searchcity' placeholder='Enter City Name to find Weather Information' className='form-control form-control-lg p-4' onChange={(event) => setCity(event.target.value)}></input>
                    <span className='input-group-text'>
                        <button className='btn btn-primary' type='button' onClick={() => loadWeatherData()}>Search</button>
                    </span>
                </div>
            

            <div className='my-3'>
                <div className='row'>
                    <div className='col-12 text-center'>
                        <i className={icon} style={{fontSize:"100px", padding:"20px"}}></i>
                        {/* <h3>{weather[0].main}</h3> */}
                    </div>
                </div>
                <div className='row bg-info text-white '>
                    <div className='col-md-6 bg-dark text-white text-center'>
                        <h1 className='display-1 p-5'>{main.temp}</h1>
                    </div>
                    <div className='col-md-6 text-center p-5'>
                        <h1 className='display-1'>{cityName} <b>{sys.country}</b></h1>
                    </div>
                </div>

                <div className='row text-white text-center'>
                    <div className='col-md-6 bg-danger p-4'>
                        <h3>Maximum Temprature <br></br> {main.temp_max}</h3>
                    </div>

                    <div className='col-md-6 bg-success p-4'>
                        <h3>Maximum Temprature <br></br> {main.temp_min}</h3>
                    </div>

                    <div className='col-md-12 bg-warning p-4'>
                        <h3>Humidity  {main.humidity}</h3>
                    </div>
                </div>

                <div className='row text-white text-center'>
                    <div className='col-md-6 bg-danger p-4'>
                        <h3>Wind Speed <br></br> {wind.speed}</h3>
                    </div>

                    <div className='col-md-6 bg-success p-4'>
                        <h3>Degree <br></br> {wind.deg}</h3>
                    </div>
                </div>
                
                <div className='row text-white text-center'>
                    <div className='col-md-6 bg-warning p-4'>
                        {/* <h3>Sunrise <br></br> {new Date().toLocaleString()}</h3> */}
                        <h3>Sunrise <br></br> {sunrisetimestr}</h3>
                    </div>

                    <div className='col-md-6 bg-primary p-4'>
                        <h3>Sunset <br></br> {sunsettimestr}</h3>
                    </div>
                </div>
            </div>
        </div>
    </>
}

export default WeatherInfo;