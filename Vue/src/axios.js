import axios from "axios";

const instance = axios.create({
	baseURL: "http://localhost:8000/api/",
});
instance.defaults.headers.post["Access-Control-Allow-Origin"] = "*";
instance.defaults.headers.post["Content-Type"] = "application/json";

export default instance;
