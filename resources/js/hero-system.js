import * as THREE from 'three';

const hero = document.querySelector('.tmo-hero');
const mount = document.querySelector('.tmo-system__canvas');

if (hero && mount) {
    const scene = new THREE.Scene();

    const camera = new THREE.PerspectiveCamera(
        38,
        mount.clientWidth / mount.clientHeight,
        0.1,
        100
    );

    camera.position.set(0, 0, 10);

    const renderer = new THREE.WebGLRenderer({
        antialias: true,
        alpha: true,
        powerPreference: 'high-performance'
    });

    renderer.setPixelRatio(Math.min(window.devicePixelRatio, 1.8));
    renderer.setSize(mount.clientWidth, mount.clientHeight);
    renderer.outputColorSpace = THREE.SRGBColorSpace;

    mount.appendChild(renderer.domElement);

    const system = new THREE.Group();
    scene.add(system);

    const nodeCount = window.innerWidth < 700 ? 95 : 190;
    const nodePositions = [];
    const nodeGeometry = new THREE.BufferGeometry();
    const nodeData = new Float32Array(nodeCount * 3);

    for (let i = 0; i < nodeCount; i++) {
        const radius = 2.2 + Math.random() * 2.5;
        const angle = Math.random() * Math.PI * 2;
        const height = (Math.random() - .5) * 5.8;

        const x = Math.cos(angle) * radius;
        const y = height;
        const z = Math.sin(angle) * radius;

        nodePositions.push(new THREE.Vector3(x, y, z));

        nodeData[i * 3] = x;
        nodeData[i * 3 + 1] = y;
        nodeData[i * 3 + 2] = z;
    }

    nodeGeometry.setAttribute(
        'position',
        new THREE.BufferAttribute(nodeData, 3)
    );

    const nodeMaterial = new THREE.PointsMaterial({
        color: 0x66e0b0,
        size: .045,
        transparent: true,
        opacity: .72,
        blending: THREE.AdditiveBlending,
        depthWrite: false
    });

    const nodes = new THREE.Points(nodeGeometry, nodeMaterial);
    system.add(nodes);

    const connectionPositions = [];

    for (let i = 0; i < nodePositions.length; i++) {
        const distances = [];

        for (let j = 0; j < nodePositions.length; j++) {
            if (i === j) continue;

            distances.push({
                index: j,
                distance: nodePositions[i].distanceTo(nodePositions[j])
            });
        }

        distances.sort((a, b) => a.distance - b.distance);

        distances.slice(0, 3).forEach(connection => {
            if (connection.distance < 3.2) {
                const a = nodePositions[i];
                const b = nodePositions[connection.index];

                connectionPositions.push(
                    a.x, a.y, a.z,
                    b.x, b.y, b.z
                );
            }
        });
    }

    const connectionGeometry = new THREE.BufferGeometry();

    connectionGeometry.setAttribute(
        'position',
        new THREE.Float32BufferAttribute(connectionPositions, 3)
    );

    const connectionMaterial = new THREE.LineBasicMaterial({
        color: 0x4267ff,
        transparent: true,
        opacity: .12,
        blending: THREE.AdditiveBlending,
        depthWrite: false
    });

    const connections = new THREE.LineSegments(
        connectionGeometry,
        connectionMaterial
    );

    system.add(connections);

    const coreGeometry = new THREE.IcosahedronGeometry(1.25, 3);

    const coreMaterial = new THREE.MeshBasicMaterial({
        color: 0x15966b,
        transparent: true,
        opacity: .045,
        wireframe: true
    });

    const core = new THREE.Mesh(coreGeometry, coreMaterial);
    system.add(core);

    const innerGeometry = new THREE.IcosahedronGeometry(.72, 2);

    const innerMaterial = new THREE.MeshBasicMaterial({
        color: 0xffb36b,
        transparent: true,
        opacity: .12,
        wireframe: true
    });

    const innerCore = new THREE.Mesh(innerGeometry, innerMaterial);
    system.add(innerCore);

    const particleCount = window.innerWidth < 700 ? 350 : 700;
    const particleData = new Float32Array(particleCount * 3);

    for (let i = 0; i < particleCount; i++) {
        const radius = 2 + Math.random() * 5;
        const angle = Math.random() * Math.PI * 2;
        const y = (Math.random() - .5) * 8;

        particleData[i * 3] = Math.cos(angle) * radius;
        particleData[i * 3 + 1] = y;
        particleData[i * 3 + 2] = Math.sin(angle) * radius;
    }

    const particleGeometry = new THREE.BufferGeometry();

    particleGeometry.setAttribute(
        'position',
        new THREE.BufferAttribute(particleData, 3)
    );

    const particleMaterial = new THREE.PointsMaterial({
        color: 0x55b8ff,
        size: .018,
        transparent: true,
        opacity: .5,
        blending: THREE.AdditiveBlending,
        depthWrite: false
    });

    const particles = new THREE.Points(
        particleGeometry,
        particleMaterial
    );

    system.add(particles);

    const energyGeometry = new THREE.BufferGeometry();
    const energyPositions = [];

    for (let i = 0; i < 13; i++) {
        const radius = 2.4 + Math.random() * 2.2;
        const angle = Math.random() * Math.PI * 2;

        energyPositions.push(
            Math.cos(angle) * radius,
            (Math.random() - .5) * 4,
            Math.sin(angle) * radius
        );
    }

    energyGeometry.setAttribute(
        'position',
        new THREE.Float32BufferAttribute(energyPositions, 3)
    );

    const energyMaterial = new THREE.PointsMaterial({
        color: 0xffb36b,
        size: .08,
        transparent: true,
        opacity: .9,
        blending: THREE.AdditiveBlending,
        depthWrite: false
    });

    const energy = new THREE.Points(
        energyGeometry,
        energyMaterial
    );

    system.add(energy);

    const pointer = new THREE.Vector2();
    const targetRotation = new THREE.Vector2();
    const currentRotation = new THREE.Vector2();

    window.addEventListener('pointermove', event => {
        pointer.x = (event.clientX / window.innerWidth) * 2 - 1;
        pointer.y = -(event.clientY / window.innerHeight) * 2 + 1;

        targetRotation.x = pointer.y * .14;
        targetRotation.y = pointer.x * .18;
    }, { passive: true });

    const clock = new THREE.Clock();

    const resize = () => {
        const width = mount.clientWidth;
        const height = mount.clientHeight;

        camera.aspect = width / height;
        camera.updateProjectionMatrix();

        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 1.8));
        renderer.setSize(width, height);
    };

    window.addEventListener('resize', resize, { passive: true });

    const animate = () => {
        const elapsed = clock.getElapsedTime();

        currentRotation.x += (targetRotation.x - currentRotation.x) * .035;
        currentRotation.y += (targetRotation.y - currentRotation.y) * .035;

        system.rotation.x = currentRotation.x + Math.sin(elapsed * .18) * .025;
        system.rotation.y = currentRotation.y + elapsed * .025;

        nodes.rotation.z = Math.sin(elapsed * .15) * .035;
        connections.rotation.z = nodes.rotation.z;

        core.rotation.x = elapsed * .16;
        core.rotation.y = elapsed * .22;

        innerCore.rotation.x = -elapsed * .24;
        innerCore.rotation.y = elapsed * .31;

        particles.rotation.y = -elapsed * .012;
        particles.rotation.x = Math.sin(elapsed * .09) * .025;

        energy.rotation.y = elapsed * .07;

        const pulse = 1 + Math.sin(elapsed * 1.2) * .035;

        core.scale.setScalar(pulse);
        innerCore.scale.setScalar(1 + Math.sin(elapsed * 1.7) * .05);

        renderer.render(scene, camera);

        requestAnimationFrame(animate);
    };

    resize();
    animate();
}