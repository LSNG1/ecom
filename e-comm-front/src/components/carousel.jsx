import * as React from 'react';
import { useTheme } from '@mui/material/styles';
import Box from '@mui/material/Box';
import MobileStepper from '@mui/material/MobileStepper';
import Paper from '@mui/material/Paper';
import Typography from '@mui/material/Typography';
import Button from '@mui/material/Button';
import KeyboardArrowLeft from '@mui/icons-material/KeyboardArrowLeft';
import KeyboardArrowRight from '@mui/icons-material/KeyboardArrowRight';
import SwipeableViews from 'react-swipeable-views';
import { autoPlay } from 'react-swipeable-views-utils';
import "./carousel.css";


const AutoPlaySwipeableViews = autoPlay(SwipeableViews);

const images = [
    {
        label: "",
        imgPath:
            'https://media.topachat.com/media/s1000/649be289cb42ac1f062be67d.webp',
    },
    {
        label: "",
        imgPath:
            'https://media.topachat.com/media/s1000/64c77d9e642f572b251f3ddf.webp',
    },
    {
        label: "",
        imgPath:
            'https://media.ldlc.com/encart/p/21462_b.jpg',
    },
    {
        label: "",
        imgPath:
            'https://media.ldlc.com/encart/p/21501_b.jpg',
    },
    {
        label: "",
        imgPath:
            'https://www.aorus.com/image/banner/GOELITE-1690280290.jpg',
    },
    {
        label: "",
        imgPath:
            'https://media.topachat.com/media/s1000/63639dcc3b1f41344e0c11a3.webp',
    },
];

function SwipeableTextMobileStepper() {
    const theme = useTheme();
    const [activeStep, setActiveStep] = React.useState(0);

    const handleNext = () => {
        setActiveStep((prevActiveStep) => prevActiveStep + 1);
    };

    const handleBack = () => {
        setActiveStep((prevActiveStep) => prevActiveStep - 1);
    };

    const handleStepChange = (step) => {
        setActiveStep(step);
    };

    return (
        <Box sx={{ minWidth: 800, flexGrow: 1 }}>
            <Paper
                square
                elevation={0}
                sx={{
                    marginright: 160,
                    display: 'flex',
                    alignItems: 'center',
                    height: 200,
                    width: 600,
                    pl: 2,
                    bgcolor: 'background.default',
                }}
            >
                <Typography>
                    {images[activeStep] && images[activeStep].label}
                </Typography>
            </Paper>
            <AutoPlaySwipeableViews
                axis={theme.direction === 'rtl' ? 'x-reverse' : 'x'}
                index={activeStep}
                onChangeIndex={handleStepChange}
                enableMouseEvents
            >
                {images.map((step, index) => (
                    <div key={step.label}>
                        {Math.abs(activeStep - index) <= 2 ? (
                            <Box
                                component="img"
                                sx={{
                                    height: '1600',
                                    display: 'block',
                                    maxWidth: 3000,
                                    overflow: 'hidden',
                                    width: '400%%',
                                }}
                                src={step.imgPath}
                                alt={step.label}
                            />
                        ) : null}
                    </div>
                ))}
            </AutoPlaySwipeableViews>
            <MobileStepper
                variant="progress"
                steps={6}
                position="static"
                activeStep={activeStep}
                sx={{ maxWidth: 400, flexGrow: 1 }}
                nextButton={
                    <Button size="small" onClick={handleNext} disabled={activeStep === 5}>
                        Next
                        {theme.direction === 'rtl' ? (
                            <KeyboardArrowLeft />
                        ) : (
                            <KeyboardArrowRight />
                        )}
                    </Button>
                }
                backButton={
                    <Button size="small" onClick={handleBack} disabled={activeStep === 0}>
                        {theme.direction === 'rtl' ? (
                            <KeyboardArrowRight />
                        ) : (
                            <KeyboardArrowLeft />
                        )}
                        Back
                    </Button>
                }
            />
        </Box>
    );
}

export default SwipeableTextMobileStepper;