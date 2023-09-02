/* The code is importing the necessary dependencies for the React component. */
import React from "react";
import {
	AdminGuesser,
	hydraDataProvider,
	hydraSchemaAnalyzer,
} from "@api-platform/admin";

/* The code is setting up the configuration for the data provider and schema analyzer used by the
`AdminGuesser` component. */
const api_entrypoint = "http://localhost:8000/api";
const dataProvider = hydraDataProvider({ entrypoint: api_entrypoint });
const schemaAnalyzer = hydraSchemaAnalyzer();

/* The code is defining a functional component called `Admin` using arrow function syntax. This
component is exporting as the default export of the module. */
export const Admin = () => (
	<>
		<AdminGuesser basename="/admin" dataProvider={dataProvider} schemaAnalyzer={schemaAnalyzer}>

		</AdminGuesser>
	</>
);
/* The line `export default Admin;` is exporting the `Admin` component as the default export of the
module. This means that when another module imports this module, they can import the `Admin`
component directly without having to specify its name. For example, in another module, you can
import the `Admin` component like this: `import Admin from './Admin'`. */
export default Admin;