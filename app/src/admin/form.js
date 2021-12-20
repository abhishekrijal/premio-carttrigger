import {
	FormControl,
	FormLabel
} from "@chakra-ui/form-control";
import {
	Box, Button, Grid, Select
} from "@chakra-ui/react";
import { useForm } from 'react-hook-form';
import Sidebar from './sidebar';


export default () => {

	const {
		handleSubmit,
		register,
		formState: { errors, isSubmitting },
	} = useForm()

	function onSubmit(values) {
		return new Promise((resolve) => {
			setTimeout(() => {
				alert(JSON.stringify(values, null, 2))
				resolve()
			}, 3000)
		})
	}

	return (
		<Box w="100%" maxW={'7xl'} m="0 auto" py={16}>
			<Grid templateColumns='repeat(2, 1fr)' gap={6} >
				<Box
					p={4}
					borderWidth="1px"
					rounded="lg"
					shadow="1px 1px 3px rgba(0,0,0,0.3)"
				>
					<form onSubmit={handleSubmit(onSubmit)}>
						<FormControl>
							<FormLabel htmlFor='country'>Country</FormLabel>
							<Select id='country' placeholder='Select country'>
								<option>Cart money value</option>
								<option>Number of cart items</option>
								<option>Products in the cart</option>
							</Select>
						</FormControl>
						<FormControl>
							<FormLabel htmlFor='country'>Country</FormLabel>
							<Select id='country' placeholder='Select country'>
								<option>Over or equal</option>
								<option>Equal</option>
								<option>Under</option>
							</Select>
						</FormControl>
						<Button mt={4} colorScheme='teal' isLoading={isSubmitting} type='submit'>
							Submit
						</Button>
					</form>
				</Box>
				<Box p="4">
					<Sidebar />
				</Box>
			</Grid>
		</Box>
	)
}
