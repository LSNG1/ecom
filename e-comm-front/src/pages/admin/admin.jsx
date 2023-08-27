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
     <iframe
      src="http://localhost:8000/api"
      title="API Platform Admin Interface"
      style={{ width: '100%', height: '100vh', border: 'none' }}
    ></iframe>
  </>
);

export default Admin;
