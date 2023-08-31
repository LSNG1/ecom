import React from "react";
import {
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
    <AdminGuesser basename="/admin" dataProvider={dataProvider} schemaAnalyzer={schemaAnalyzer}>
      <ResourceGuesser name={"boxes"} />
      <ResourceGuesser name={"cpus"} />
      <ResourceGuesser name={"cpu_coolers"} />
      <ResourceGuesser name={"gpus"} />
      <ResourceGuesser name={"hard_drives"} />
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