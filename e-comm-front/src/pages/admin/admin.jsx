import React from "react";
import { Link } from "react-router-dom";
import {
	HydraAdmin,
  AdminGuesser,
  hydraDataProvider,
  hydraSchemaAnalyzer,
  ResourceGuesser,
} from "@api-platform/admin";

const api_entrypoint = "http://localhost:8000/api";
const dataProvider = hydraDataProvider({ entrypoint: api_entrypoint });
const schemaAnalyzer = hydraSchemaAnalyzer();

export const Admin = () => (
  <>
    <h1>Admin Component Debug</h1>
{/* 
    <div>
      <Link to="/admin/boxes">Boxes</Link>
      <Link to="/admin/cpus">CPUs</Link>
      <Link to="/admin/cpu_coolers">CPU Coolers</Link>
      <Link to="/admin/gpus">GPUs</Link>
    </div> */}
	<HydraAdmin entrypoint="http://localhost:8000/api">
    {/* ... */}
  </HydraAdmin>
    {/* <AdminGuesser dataProvider={dataProvider} schemaAnalyzer={schemaAnalyzer}>
    </AdminGuesser> */}
  </>
);

export default Admin;
