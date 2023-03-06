import { Layout } from "../components/Layout";
import { CustomHead } from "../components/CustomHead";
import { Form } from "../components/form/Form";
import styles from "../styles/home.module.css";
import { MotionSection } from "../components/MotionSection";
import { useInView } from "react-intersection-observer";
import mainImage from "../public/media/about_img.jpg";
import Image from "next/image";
import supabase from "../lib/supabase";

export default function HomePage() {
  const { ref: section, inView: sectionIsVisible } = useInView({
    triggerOnce: true,
  });

  console.log(supabase);

  return (
    <>
      <CustomHead title="Alpha Motors" />
      <Layout>
        <MotionSection
          motionRef={section}
          motionBoolean={sectionIsVisible}
          customClass={styles.about_section}
        >
          <div className={`box ${styles.about_inner}`}>
            <div className=""></div>
            <Image src={mainImage} alt="main image" loading="lazy" />
          </div>
        </MotionSection>
        <Form />
      </Layout>
    </>
  );
}
