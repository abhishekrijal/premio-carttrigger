import { Box, SimpleGrid } from '@chakra-ui/react'
export default () => {
	return (
		<SimpleGrid columns={1} spacing={10}>
			<Box bg='tomato' height='80px'></Box>
			<Box bg='tomato' height='80px'></Box>
			<Box bg='tomato' height='80px'></Box>
			<Box bg='tomato' height='80px'></Box>
			<Box bg='tomato' height='80px'></Box>
		</SimpleGrid>
	)
}
