import { useEffect, useState } from "react";

function GetAPI(){

    let APIURL = "https://dummyjson.com/products";
    let [productsData, setProductsData] = useState([]);

    // dont use following code for fetch data from API it will generate number of request every time

    /*fetch(APIURL).then((result)=>{
        result.json().then((response)=>{
            //console.log(response);
            setProductsData(response["products"]);
            console.log(productsData);
        });
    });*/

    useEffect(()=>{
        fetch(APIURL).then((result)=>{
            result.json().then((response)=>{
                //console.log(response);
                setProductsData(response.products);
                //console.log(productsData);
            });
        });
    }, []);

    return <>
        <h1 className="text-white bg-primary p-4">Get Data From API</h1>
        <div className="table-responsive">
        <table className="table table-striped table-hover">
            <thead className="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Rating</th>
                    <th>Stock</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Photo</th>
                </tr>
            </thead>

            <tbody>
                {
                    productsData.map((product)=> 
                        <tr>
                            <td>{product.id}</td>
                            <td>{product.title}</td>
                            <td>{product.description}</td>
                            <td>{product.price}</td>
                            <td>{product.discountPercentage}</td>
                            <td>{product.rating}</td>
                            <td>{product.stock}</td>
                            <td>{product.brand}</td>
                            <td>{product.category}</td>
                            <td><img src={product.thumbnail} className="img-rounded" height="100" width="100" /></td>
                        </tr>
                    )
                }
            </tbody>
        </table>
        </div>
    </>
}

export default GetAPI;