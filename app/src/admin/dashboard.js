import { useForm } from 'react-hook-form'
import {
    Box, Button, Stack, Flex, FormControl, FormErrorMessage,
    FormLabel, Heading, Input, StackDivider, VStack, Select
} from "@chakra-ui/react";
import { __ } from '@wordpress/i18n';
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
        <Stack minH={'100vh'} direction={{ base: 'column', md: 'row' }}>
            <Flex p={8} flex={1} align={'center'} justify={'center'}>
                <Stack spacing={4} w={'full'} maxW={'md'}>
                    <Box p="4">
                        <Heading>{__("Cart Trigger Settings", "premio-carttrigger")}</Heading>
                        <form onSubmit={handleSubmit(onSubmit)}>
                            <FormControl isInvalid={errors.name}>
                                <FormLabel htmlFor='name'>First name</FormLabel>
                                <Input
                                    id='name'
                                    placeholder='name'
                                    {...register('name', {
                                        required: 'This is required',
                                        minLength: { value: 4, message: 'Minimum length should be 4' },
                                    })}
                                />
                                <FormErrorMessage>
                                    {errors.name && errors.name.message}
                                </FormErrorMessage>
                                <FormLabel htmlFor='cartType'>Cart Type</FormLabel>
                                <Select  {...register('cartType', {
                                    required: 'This is required',
                                })} id='cartType'>
                                    <option>Cart money value</option>
                                    <option>Number of cart items</option>
                                    <option>Products in the cart</option>
                                </Select>
                                <FormErrorMessage>
                                    {errors.conditionType && errors.conditionType.message}
                                </FormErrorMessage>
                                <FormLabel htmlFor='conditionType'>Condition Type</FormLabel>
                                <Select  {...register('conditionType', {
                                    required: 'This is required',
                                })} id='conditionType'>
                                    <option>Over or equal</option>
                                    <option>Equal</option>
                                    <option>Under</option>
                                </Select>
                                <FormErrorMessage>
                                    {errors.conditionType && errors.conditionType.message}
                                </FormErrorMessage>
                            </FormControl>
                            <Button mt={4} colorScheme='teal' isLoading={isSubmitting} type='submit'>
                                Submit
                            </Button>
                        </form>
                    </Box>
                </Stack>
            </Flex>
        </Stack>
    )
};