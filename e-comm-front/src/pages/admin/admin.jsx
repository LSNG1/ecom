import React from "react";
import { Link } from "react-router-dom";
import {
  AdminGuesser,
  hydraDataProvider,
  hydraSchemaAnalyzer,
  ResourceGuesser,
} from "@api-platform/admin";

const api_entrypoint = "https://localhost:8000/api";

const dataProvider = hydraDataProvider({ entrypoint: api_entrypoint });
const schemaAnalyzer = hydraSchemaAnalyzer();

export const Admin = () => (
  <>
    <h1>Admin Component Debug</h1>

    <div>
      <Link to="/admin/boxes">Boxes</Link>
      <Link to="/admin/cpus">CPUs</Link>
      <Link to="/admin/cpu_coolers">CPU Coolers</Link>
      <Link to="/admin/gpus">GPUs</Link>
    </div>

    <AdminGuesser dataProvider={dataProvider} schemaAnalyzer={schemaAnalyzer}>
      <ResourceGuesser name={"admin/boxes"} />
      <ResourceGuesser name={"cpus"} />
      <ResourceGuesser name={"cpu_coolers"} />
      <ResourceGuesser name={"gpus"} />
      <ResourceGuesser name={"admin/hard_drives"} />
      <ResourceGuesser name={"headphones"} />
      <ResourceGuesser name={"memories"} />
      <ResourceGuesser name={"motherboards"} />
      <ResourceGuesser name={"mice"} />
      <ResourceGuesser name={"power_supplies"} />
      <ResourceGuesser name={"users"} />
    </AdminGuesser>
  </>
);

export default Admin;
