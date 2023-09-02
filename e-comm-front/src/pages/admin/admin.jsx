import React from "react";
import {
	AdminGuesser,
	hydraDataProvider,
	hydraSchemaAnalyzer,
} from "@api-platform/admin";

const api_entrypoint = "http://localhost:8000/api";
const dataProvider = hydraDataProvider({ entrypoint: api_entrypoint });
const schemaAnalyzer = hydraSchemaAnalyzer();

export const Admin = () => (
	<>
		<AdminGuesser basename="/admin" dataProvider={dataProvider} schemaAnalyzer={schemaAnalyzer}>

		</AdminGuesser>
	</>
);

export default Admin;