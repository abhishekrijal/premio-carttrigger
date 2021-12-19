import { render } from "@wordpress/element";
import Dashboard from "./dashboard";
import {ChakraProvider} from '@chakra-ui/react';

// 1. Import `extendTheme`
import { extendTheme } from "@chakra-ui/react"

// 2. Call `extendTheme` and pass your custom values
const theme = extendTheme({
colors: {
	brand: {
		100: "#f7fafc",
		// ...
		900: "#1a202c",
	},
},
})

function App() {
	return (
		<ChakraProvider theme={theme}>
			<Dashboard /> 
		</ChakraProvider>
	)
}

(function () {
	let app = document.getElementById("premioCartTriggerAdminPageRoot");

	document.addEventListener("DOMContentLoaded", function () {
		if (null !== app) {
			render(<App />, app);
		}
	});
})();

