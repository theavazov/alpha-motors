import { CustomHead } from "../components/CustomHead";
import { Form } from "../components/form/Form";
import { Layout } from "../components/Layout";
import { Location } from "../components/location/Location";
import styles from "../styles/about.module.css";
import mainImage from "../public/media/about_img.jpg";
import Image from "next/image";

export default function AboutPage() {
  return (
    <>
      <CustomHead title={"Alpha motors | About"} />
      <Layout>
        <Location title="About company" location="About" />
        <section>
          <div className={`box ${styles.about_inner}`}>
            <div className={styles.about_texts}>
              <p>
                Alpha Motors and Parts is a used car dealer operating in England
                and Wales. Our agents will be happy to provide you with all the
                information you need and make an appointment both physically and
                online. All cars are sold with a guarantee a month for engine
                and gearbox. In addition, you can order any auto parts you are
                looking for from us. We distribute directly from the
                manufacturer and official suppliers. Any non-standard or
                non-market parts are available subject to availability from our
                partner companies.
              </p>
              <p>
                Our board of directors inspires, motivates and guides the
                organisation to greater success by defining new and exciting
                horizons to scale. Senior leadership, comprising eminent
                industry experts who bring a wealth of knowledge, works to
                achieve the vision and mission of the organisation by setting
                high standards of performance and excellence.
              </p>
            </div>
            <div className={styles.mini_img}>
              <Image src={mainImage} alt={"main image"} loading="lazy" />
            </div>
            <div className={styles.img}>
              <Image src={mainImage} alt={"main image"} loading="lazy" />
            </div>
          </div>
        </section>
        <Form />
      </Layout>
    </>
  );
}
